import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams, App } from 'ionic-angular';
import { QRScanner, QRScannerStatus } from '@ionic-native/qr-scanner';
import { TabsPage } from '../tabs/tabs';
import { RestProvider } from '../../providers/rest/rest';
import { ScannerOkPage } from '../scanner-ok/scanner-ok';
import { ScannerWrongPage } from '../scanner-wrong/scanner-wrong';

@IonicPage()
@Component({
  selector: 'page-scanner',
  templateUrl: 'scanner.html',
})
export class ScannerPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, private qrScanner: QRScanner, public appCtrl: App, public restProvider:  RestProvider) {
  }

  ionViewDidEnter() {
    var ticket:any;
    this.restProvider.getTicket("78").then((result) => {
      ticket = result;
      console.log(ticket);
      this.navCtrl.push(ScannerOkPage, {
        ticket: ticket
      });
    }, (err) => {
      console.log(err);
      this.navCtrl.push(ScannerWrongPage, {
        err: err
      });
    });
    // Optionally request the permission early
    // this.qrScanner.prepare()
    //   .then((status: QRScannerStatus) => {
    //     if (status.authorized) {
    //       this.qrScanner.show();
    //       (window.document.querySelector('ion-app') as HTMLElement).classList.add('cameraView');

    //       let scanSub = this.qrScanner.scan().subscribe((text: string) => {
    //         var ticket:any;
    //         this.restProvider.getTicket(text).then((result) => {
    //           ticket = result;
    //           this.navCtrl.push(ScannerOkPage, {
    //             ticket: ticket
    //           });
    //         }, (err) => {
    //           this.navCtrl.push(ScannerWrongPage, {
    //             err: err
    //           });
    //         });
    //         this.qrScanner.hide();
    //         (window.document.querySelector('ion-app') as HTMLElement).classList.remove('cameraView');
    //         scanSub.unsubscribe();
    //       });
    //     } else if (status.denied) {
    //       let nav = this.appCtrl.getRootNav();
    //       nav.setRoot(TabsPage);
    //     } else {
    //       // permission was denied, but not permanently. You can ask for permission again at a later time.
    //     }
    //   })
    // .catch((e: any) => console.log('Error is', e));
  }

  ionViewWillLeave(){
    this.qrScanner.prepare()
    .then((status: QRScannerStatus) => {
      if (status.authorized) {
        this.qrScanner.hide();
        (window.document.querySelector('ion-app') as HTMLElement).classList.remove('cameraView');
      }
    })
    .catch((e: any) => console.log('Error is', e));
  }

  toggleFlashlight(){
    if (this.qrScanner.enableLight()) {
      this.qrScanner.disableLight()
    } else {
      this.qrScanner.enableLight()
    }
  }
}
