import { Component, ViewChild } from '@angular/core';
import { NavController } from 'ionic-angular';
import { TabsPage } from '../tabs/tabs';
import { App, ViewController, Slides } from 'ionic-angular';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  @ViewChild(Slides) slides: Slides;

  constructor(
    public navCtrl: NavController,
    public viewCtrl: ViewController,
    public appCtrl: App,
  ) {}

  changeSlide() {
    if (this.slides.isEnd()) {
      this.slides.slidePrev();
    } else {
      this.slides.slideNext();
    }
  }

  checkMail() {
    let nav = this.appCtrl.getRootNav();
    nav.setRoot(TabsPage);
    // this.push(MarketPage);
  }

}
