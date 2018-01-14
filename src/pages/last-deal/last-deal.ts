import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { GlobalService } from '../../services/globalService';

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

  constructor(public navCtrl: NavController, public navParams: NavParams, public service: GlobalService) {
  }

  ionViewDidLoad() {
    // Do something on first load
  }

  ionViewWillEnter() {
    var informationPopup = window.localStorage.getItem('informationPopup');
    var textInformtionPopup = '<p>Last Deal allow you to buy the tickets sold at the last minute. When a sale is open, it is indicated by an arrow.</br>When it is closed by a bell. Click on the bell to receive alerts on this sale</p>';
    if (informationPopup != "1") {
      this.service.informationAlert(textInformtionPopup);
    }
    // else {
    //   window.localStorage.setItem('informationPopup',1);
    // }
  }

}
