import { Component } from '@angular/core';
import { App, IonicPage, NavController, NavParams } from 'ionic-angular';
import { TabsPage } from '../tabs/tabs';

/**
 * Generated class for the LoginPasswordPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-login-password',
  templateUrl: 'login-password.html',
})
export class LoginPasswordPage {
  passcode = "";

  constructor(public navCtrl: NavController, public navParams: NavParams, public appCtrl: App) {
  }

  ionViewDidLoad() {

  }

  init() {
    this.passcode = "";
  }

  add(value) {
    if(this.passcode.length < 4) {
      this.passcode = this.passcode + value;
      if(this.passcode.length == 4) {
        let nav = this.appCtrl.getRootNav();
        nav.setRoot(TabsPage);
      }
    }
  }

  delete() {
    if(this.passcode.length > 0) {
      this.passcode = this.passcode.substring(0, this.passcode.length - 1);
    }
  }

}
