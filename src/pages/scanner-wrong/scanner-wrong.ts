import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

/**
 * Generated class for the ScannerWrongPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-scanner-wrong',
  templateUrl: 'scanner-wrong.html',
})
export class ScannerWrongPage {
  tabBarElement = document.querySelector('div.tabbar');

  constructor(public navCtrl: NavController, public navParams: NavParams) {

  }

  ionViewDidEnter() {
    (window.document.querySelector('div.tabbar') as HTMLElement).classList.add('hidden');
  }

  ionViewWillLeave(){
    (window.document.querySelector('div.tabbar') as HTMLElement).classList.remove('hidden');
  }

  goBack() {
    this.navCtrl.pop();
  }


}
