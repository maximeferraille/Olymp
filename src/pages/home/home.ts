import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { TabsPage } from '../tabs/tabs';
import { App, ViewController } from 'ionic-angular';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  constructor(
    public navCtrl: NavController,
    public viewCtrl: ViewController,
    public appCtrl: App
  ) {}

  goToOtherPage() {
    let nav = this.appCtrl.getRootNav();
    nav.setRoot(TabsPage);
    // this.push(MarketPage);
  }

}
