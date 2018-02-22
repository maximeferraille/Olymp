import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-scanner-ok',
  templateUrl: 'scanner-ok.html',
})
export class ScannerOkPage {
  ticket:any;
  ticket_id:string;
  createdCode = null;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
    this.initializeItems();
  }

  initializeItems() {
    this.ticket     = this.navParams.get('ticket');
    this.ticket_id  = this.navParams.get('ticket_id')
  }

  buyTicket(){

  }

  ionViewDidEnter() {
    (window.document.querySelector('div.tabbar') as HTMLElement).classList.add('hidden');
  }

  ionViewWillLeave(){
    (window.document.querySelector('div.tabbar') as HTMLElement).classList.remove('hidden');
  }
}
