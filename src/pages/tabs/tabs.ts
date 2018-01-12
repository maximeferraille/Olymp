import { Component } from '@angular/core';

import { LastDealPage } from '../last-deal/last-deal';
import { MarketPage } from '../market/market';
import { ScannerPage } from '../scanner/scanner';
import { TicketsPage } from '../tickets/tickets';
import { ProfilPage } from '../profil/profil';

@Component({
  templateUrl: 'tabs.html'
})
export class TabsPage {

  tab1Root = MarketPage;
  tab2Root = LastDealPage;
  tab3Root = ScannerPage;
  tab4Root = TicketsPage;
  tab5Root = ProfilPage;

  constructor() {

  }
}
