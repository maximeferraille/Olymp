import { Component, ViewChild } from '@angular/core';
import { NavController } from 'ionic-angular';
// import { TabsPage } from '../tabs/tabs';
import { MagicLinkPage } from '../magic-link/magic-link';
import { App, ViewController, Slides } from 'ionic-angular';
import { RestProvider } from '../../providers/rest/rest';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  @ViewChild(Slides) slides: Slides;

  user = { email: '' };

  constructor(
    public navCtrl: NavController,
    public viewCtrl: ViewController,
    public appCtrl: App,
    public restProvider: RestProvider
  ) {}

  changeSlide() {
    if (this.slides.isEnd()) {
      this.slides.slidePrev();
    } else {
      this.slides.slideNext();
    }
  }

  checkMail() {
    this.restProvider.newUser(this.user).then((result) => {
      console.log(result);
      if (result != true) {
        this.navCtrl.push(MagicLinkPage, {
          email: this.user.email
        });
      } else {
        console.log(result+'inscrit');
      }
    }, (err) => {
      console.log(err);
    });

    // this.push(MarketPage);
    // let nav = this.appCtrl.getRootNav();
    // nav.setRoot(TabsPage);
  }

}
