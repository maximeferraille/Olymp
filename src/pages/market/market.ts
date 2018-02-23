import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { RestProvider } from '../../providers/rest/rest';
import { TicketPreviewPage } from '../ticket-preview/ticket-preview';

/**
 * Generated class for the MarketPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-market',
  templateUrl: 'market.html',
})
export class MarketPage {
  private items: any;
  private result: {};

  constructor(public navCtrl: NavController, public navParams: NavParams, public restProvider: RestProvider) {
    this.restProvider.getAllTickets().then((data) => {
      this.result = data;
    }, (err) => {
      console.log(err);
    });
    this.initializeItems();
  }

  ionViewDidEnter() {
    this.restProvider.getAllTickets().then((data) => {
      this.items = data;
    }, (err) => {
      console.log(err);
    });
  }

  initializeItems() {
    this.items = this.result;
  }

  ticketSelected(item) {
    var ticket:any;
    this.restProvider.getTicket(item).then((result) => {
      ticket = result;
      this.navCtrl.push(TicketPreviewPage, {
        ticket: ticket
      });
    }, (err) => {
      console.log(err);
    });
  }

  getItems(ev: any) {
    this.initializeItems();

    var val = ev.target.value;

    if (val && val.trim() != '') {
      this.items = this.items.filter((item) => {
        return (item.description_name.toLowerCase().indexOf(val.toLowerCase()) > -1 || item.cluster_name.toLowerCase().indexOf(val.toLowerCase()) > -1);
      })
    }
  }
}
