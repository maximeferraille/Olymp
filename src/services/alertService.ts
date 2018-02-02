import { Injectable } from '@angular/core';
import { AlertController } from 'ionic-angular';

@Injectable()
export class AlertService
{
    constructor(public alertCtrl: AlertController){}

    informationAlert(text) {
        let alert = this.alertCtrl.create({
          title: 'Information',
          message: text + '<ion-icon name="ios-information-circle"></ion-icon>',
          cssClass: 'alert-information'
        });
        alert.present();
      }
}