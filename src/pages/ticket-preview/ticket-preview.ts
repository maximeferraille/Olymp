import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the TicketsPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-ticket-preview',
  templateUrl: 'ticket-preview.html',
})
export class TicketPreviewPage {
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
