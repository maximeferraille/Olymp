import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

/*
  Generated class for the RestProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class RestProvider {
  apiUrl = 'http://api.valentinchevreau.fr';
  constructor(public http: HttpClient) {}

  getUserTickets(data) {
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/ticket/user/'+data)
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  newUser(data) {
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/user/new?mail='+data.email)
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  setPincode(data) {
    return new Promise((resolve, reject) => {
      this.http.post(this.apiUrl+'/user/pincode',data)
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  connect(data) {
    return new Promise((resolve, reject) => {
      this.http.post(this.apiUrl+'/user/connect', data,{
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
      })
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  getTicket(data) {
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/ticket/'+data)
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  getAllTickets() {
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/tickets/all')
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  getTicketsByEvent(data) {
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/tickets/events/'+data)
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  getEvents(){
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/events')
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }

  getSports(){
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/sports')
        .subscribe(res => {
          resolve(res);
        }, (err) => {
          reject(err);
        });
    });
  }
}
