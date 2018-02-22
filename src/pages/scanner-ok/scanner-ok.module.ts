import { NgModule } from '@angular/core';
import { IonicPageModule } from 'ionic-angular';
import { ScannerOkPage } from './scanner-ok';

@NgModule({
  declarations: [
    ScannerOkPage,
  ],
  imports: [
    IonicPageModule.forChild(ScannerOkPage),
  ],
})
export class ScannerOkPageModule {}
