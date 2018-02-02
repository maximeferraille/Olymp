import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { MagicLinkPage } from './magic-link';

@NgModule({
  declarations: [
    MagicLinkPage,
  ],
  imports: [
    IonicPageModule.forChild(MagicLinkPage),
  ],
})
export class MagicLinkPageModule {}
