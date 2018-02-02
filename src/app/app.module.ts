import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { StatusBar } from '@ionic-native/status-bar';
import { HttpClientModule } from '@angular/common/http';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { LastDealPage } from '../pages/last-deal/last-deal';
import { MarketPage } from '../pages/market/market';
import { ScannerPage } from '../pages/scanner/scanner';
import { TicketsPage } from '../pages/tickets/tickets';
import { ProfilPage } from '../pages/profil/profil';
import { MagicLinkPage } from '../pages/magic-link/magic-link';
import { RestProvider } from '../providers/rest/rest';


@NgModule({
  declarations: [
    MyApp,
    HomePage,
    MagicLinkPage,
    TabsPage,
    LastDealPage,
    MarketPage,
    ScannerPage,
    TicketsPage,
    ProfilPage
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    IonicModule.forRoot(MyApp)
  ],
  bootstrap: [IonicApp],
  entryComponents: [
    MyApp,
    HomePage,
    MagicLinkPage,
    TabsPage,
    LastDealPage,
    MarketPage,
    ScannerPage,
    TicketsPage,
    ProfilPage
  ],
  providers: [
    StatusBar,
    SplashScreen,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    RestProvider
  ]
})
export class AppModule {}
