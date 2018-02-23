import { Component } from '@angular/core';
import { App, IonicPage, NavController, NavParams } from 'ionic-angular';
import { TabsPage } from '../tabs/tabs';
import { RestProvider } from '../../providers/rest/rest';

/**
 * Generated class for the GeneratePasswordPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-generate-password',
  templateUrl: 'generate-password.html',
})
export class GeneratePasswordPage {
  tokenAuth = window.localStorage.getItem('token_auth');
  passcode = "";
  err:null;

  constructor(public navCtrl: NavController, public navParams: NavParams, public appCtrl: App, public restProvider: RestProvider) {

  }

  init() {
    this.passcode = "";
  }

  add(value) {
    if(this.passcode.length < 4) {
      this.passcode = this.passcode + value;
      if(this.passcode.length == 4) {
        var data = {pincode: this.passcode, id: this.tokenAuth};
        this.restProvider.connect(data).then((result) => {
            console.log(result);
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
