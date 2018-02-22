import { Component, ViewChild } from '@angular/core';
import { NavController } from 'ionic-angular';
import { MagicLinkPage } from '../magic-link/magic-link';
import { LoginPasswordPage } from '../login-password/login-password';
import { App, ViewController, Slides } from 'ionic-angular';
import { RestProvider } from '../../providers/rest/rest';
import { Validators, FormBuilder, FormGroup, FormControl } from '@angular/forms';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  @ViewChild(Slides) slides: Slides;

  user = { email: '' };
  mailForm = new FormGroup({
    email: new FormControl(),
  });

  constructor(
    public navCtrl:       NavController,
    public viewCtrl:      ViewController,
    public appCtrl:       App,
    public restProvider:  RestProvider,
    public formBuilder:   FormBuilder
  ) {}

  ionViewDidLoad() {
    this.mailForm = this.formBuilder.group({
      email: ['', Validators.compose([
        Validators.required,
        Validators.pattern('^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$')
      ])]
    });
  }

  changeSlide() {
    if (this.slides.isEnd()) {
      this.slides.slidePrev();
    } else {
      this.slides.slideNext();
    }
  }

  checkMail() {
    this.restProvider.newUser(this.user).then((result) => {
      console.log('isok');
      if (result == true) {
        this.navCtrl.push(LoginPasswordPage)
      }
    }, (err) => {
      console.log(err);
    });

    this.navCtrl.push(MagicLinkPage, {
      email: this.user.email
    });
  }

}
