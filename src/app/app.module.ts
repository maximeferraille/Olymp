import { BrowserModule } from '@angular/platform-browser';
import { ErrorHandler, NgModule } from '@angular/core';
import { IonicApp, IonicErrorHandler, IonicModule } from 'ionic-angular';
import { SplashScreen } from '@ionic-native/splash-screen';
import { Geolocation } from '@ionic-native/geolocation';
import { StatusBar } from '@ionic-native/status-bar';
import { HttpClientModule } from '@angular/common/http';
import { Deeplinks } from '@ionic-native/deeplinks';
import { ScreenOrientation } from '@ionic-native/screen-orientation';
import { QRScanner, QRScannerStatus } from '@ionic-native/qr-scanner';

import { MyApp } from './app.component';
import { HomePage } from '../pages/home/home';
import { TabsPage } from '../pages/tabs/tabs';
import { LastDealPage } from '../pages/last-deal/last-deal';
import { MarketPage } from '../pages/market/market';
import { ScannerOkPage } from '../pages/scanner-ok/scanner-ok';
import { ScannerWrongPage } from '../pages/scanner-wrong/scanner-wrong';
import { ScannerPage } from '../pages/scanner/scanner';
import { TicketsPage } from '../pages/tickets/tickets';
import { TicketPreviewPage } from '../pages/ticket-preview/ticket-preview';
import { ProfilPage } from '../pages/profil/profil';
import { MagicLinkPage } from '../pages/magic-link/magic-link';
import { GeneratePasswordPage } from '../pages/generate-password/generate-password';
import { LoginPasswordPage } from '../pages/login-password/login-password';
import { RestProvider } from '../providers/rest/rest';
import { NgxQRCodeModule } from 'ngx-qrcode2';


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
    ProfilPage,
    GeneratePasswordPage,
    LoginPasswordPage,
    ScannerOkPage,
    ScannerWrongPage,
    TicketPreviewPage,
  ],
  imports: [
    BrowserModule,
    HttpClientModule,
    NgxQRCodeModule,
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
    ProfilPage,
    GeneratePasswordPage,
    LoginPasswordPage,
    ScannerOkPage,
    ScannerWrongPage,
    TicketPreviewPage,
  ],
  providers: [
    Deeplinks,
    StatusBar,
    SplashScreen,
    ScreenOrientation,
    QRScanner,
    Geolocation,
    {provide: ErrorHandler, useClass: IonicErrorHandler},
    RestProvider
  ]
})
export class AppModule {}
