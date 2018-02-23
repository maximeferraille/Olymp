import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { TicketPreviewPage } from './ticket-preview';

@NgModule({
  declarations: [
    TicketPreviewPage,
  ],
  imports: [
    IonicPageModule.forChild(TicketPreviewPage),
  ],
})
export class TicketPreviewPageModule {}
