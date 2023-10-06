import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { RpRoutingModule } from './rp-routing.module';
import { DashboardComponent } from './dashboard/dashboard.component';


@NgModule({
  declarations: [
    DashboardComponent
  ],
  imports: [
    CommonModule,
    RpRoutingModule
  ]
})
export class RpModule { }
