import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-magic-link',
  templateUrl: 'magic-link.html',
})
export class MagicLinkPage {
  currentEmail: string;

  constructor(
    public navCtrl: NavController,
    public navParams: NavParams
  ) {}

  ionViewDidLoad() {
    this.currentEmail = this.navParams.get('email');
    console.log(this.currentEmail);
  }

}
