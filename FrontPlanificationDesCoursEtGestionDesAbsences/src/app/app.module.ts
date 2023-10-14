import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { GestionAbsenceModule } from './gestion-absence/gestion-absence.module';
import { PlanificationCoursModule } from './planification-cours/planification-cours.module';
import { HomeModule } from './home/home.module';
import { NavigationComponent } from './home/navigation/navigation.component';
import { AppRoutingModule } from './app-routing.module';
import { RouterModule } from '@angular/router';
import { CalendarModule, DateAdapter } from 'angular-calendar';
import { adapterFactory } from 'angular-calendar/date-adapters/date-fns';

@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    GestionAbsenceModule,
    PlanificationCoursModule,
    HomeModule,
    AppRoutingModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
