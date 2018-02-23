import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AlertService } from '../../services/alertService';
import { RestProvider } from '../../providers/rest/rest';
import { Geolocation } from '@ionic-native/geolocation';
import { DateService } from '../../services/dateService';

@IonicPage()
@Component({
  selector: 'page-last-deal',
  templateUrl: 'last-deal.html',
})
export class LastDealPage {
  private items: any;
  private result: {};
  informationPopup = window.localStorage.getItem('informationPopup');

  constructor(public navCtrl: NavController, public navParams: NavParams, public service: AlertService, public restProvider: RestProvider, public dateService: DateService, private geolocation: Geolocation) {
    this.restProvider.getEvents().then((data) => {
      this.result = data;
    }, (err) => {
      console.log(err);
    });
    this.initializeItems();
  }

  initializeItems() {
    this.items = this.result;
  }

  ionViewDidEnter() {
    this.restProvider.getEvents().then((data) => {
      this.items = data;
    }, (err) => {
      console.log(err);
    });
  }

  getItems(ev: any) {
    this.initializeItems();

    var val = ev.target.value;

    if (val && val.trim() != '') {
      this.items = this.items.filter((item) => {
        return (item.discipline_name.toLowerCase().indexOf(val.toLowerCase()) > -1 || item.cluster_name.toLowerCase().indexOf(val.toLowerCase()) > -1);
      })
    }
  }

  showAlerts() {

  }

  geolocalisation() {
    this.geolocation.getCurrentPosition().then((resp) => {
      alert('No events near you');
     }).catch((error) => {
      alert('No events near you');
     });
  }

  showInformation() {
    var textInformtionPopup = '<p>Last Deal allow you to buy the tickets sold at the last minute. When a sale is open, it is indicated by an arrow.</br>When it is closed by a bell. Click on the bell to receive alerts on this sale</p>';
    if (this.informationPopup != "1") {
      this.service.informationAlert(textInformtionPopup);
    }
    // else {
    //   window.localStorage.setItem('informationPopup',1);
    // }
  }

}
