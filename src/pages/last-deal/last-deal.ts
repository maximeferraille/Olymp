import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AlertController } from 'ionic-angular';

/**
 * Generated class for the LastDealPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-last-deal',
  templateUrl: 'last-deal.html',
})
export class LastDealPage {

  constructor(public navCtrl: NavController, public navParams: NavParams, private alertCtrl: AlertController) {
  }

  informationAlert() {
    let alert = this.alertCtrl.create({
      title: 'Information',
      subTitle: 'Last Deal allow you to buy the tickets sold at the last minute. When a sale is open, it is indicated by an arrow. When it is closed by a bell. Click on the bell to receive alerts on this sale',
      buttons: ['Dismiss']
    });
    alert.present();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad LastDealPage');
  }

  ionViewWillEnter() {
    var informationPopup = window.localStorage.getItem('informationPopup');

    if (informationPopup != "1") {
      this.informationAlert();
    }
    // else {
    //   window.localStorage.setItem('informationPopup',1);
    // }
  }

}
