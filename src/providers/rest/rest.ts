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
  constructor(public http: HttpClient) {
    console.log('Hello RestProvider Provider');
  }

  newUser(data) {
    return new Promise((resolve, reject) => {
      this.http.get(this.apiUrl+'/user/new?mail='+JSON.stringify(data))
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
