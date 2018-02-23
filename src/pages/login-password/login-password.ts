import { Component } from '@angular/core';
import { App, IonicPage, NavController, NavParams } from 'ionic-angular';
import { TabsPage } from '../tabs/tabs';
import { RestProvider } from '../../providers/rest/rest';

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
  currentEmail: string;
  tokenAuth = window.localStorage.getItem('token_auth');
  err:null;

  constructor(public navCtrl: NavController, public navParams: NavParams, public appCtrl: App, public restProvider: RestProvider) {

  }

  ionViewDidEnter() {
    this.currentEmail = this.navParams.get('email');
  }

  init() {
    this.passcode = "";
  }

  add(value) {
    if(this.passcode.length < 4) {
      this.passcode = this.passcode + value;
      if(this.passcode.length == 4) {
        var data = {pincode: this.passcode, token_auth: this.tokenAuth, mail: this.currentEmail};
        this.restProvider.connect(data).then((result) => {
          console.log(result);
            var items:any;
            items = result;
            window.localStorage.setItem('token_auth',items.token);
            window.localStorage.setItem('user_id',items.id);
            let nav = this.appCtrl.getRootNav();
            nav.setRoot(TabsPage);
        }, (err) => {
          console.log(err);
          this.err = err;
        });
      }
    }
  }
  
  delete() {
    if(this.passcode.length > 0) {
      this.passcode = this.passcode.substring(0, this.passcode.length - 1);
    }
  }

}
