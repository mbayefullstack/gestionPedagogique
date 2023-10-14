import { NgModule } from '@angular/core';
import { CommonModule, registerLocaleData } from '@angular/common';
import { AnneeScolaireComponent } from './annee-scolaire/annee-scolaire.component';
import { ClasseComponent } from './classe/classe.component';
import { AddModuleComponent } from './module/add-module/add-module.component';
import { NgSelectModule } from '@ng-select/ng-select';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { ModuleComponent } from './module/module.component';
import { HttpClientModule } from '@angular/common/http';
import { PlanificationCoursComponent } from './planification-cours.component';
import { CoursComponent } from './cours/cours.component';
import { CalendarDateFormatter, CalendarModule, CalendarNativeDateFormatter, DateAdapter, DateFormatterParams } from 'angular-calendar';
import { adapterFactory } from 'angular-calendar/date-adapters/date-fns';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { EmploidDuTempsComponent } from './cours/emploid-du-temps/emploid-du-temps.component';

import localeFr from '@angular/common/locales/fr';
import { MenuComponent } from './cours/menu/menu.component';
import { CustomEventTemplateComponent } from './cours/emploid-du-temps/custom-event-template/custom-event-template.component';
import { FormSesionComponent } from './cours/form-sesion/form-sesion.component'

registerLocaleData(localeFr, 'fr');

class CustomDateFormatter extends CalendarNativeDateFormatter{
  public override dayViewHour({ date, locale }: DateFormatterParams): string {
    // const hDebut = new Intl.DateTimeFormat(locale, { hour: 'numeric', minute: 'numeric' }).format(date);
    const hDebut = new Intl.DateTimeFormat(locale, { hour: 'numeric'}).format(date);
    const dateFin = new Date(date);
    dateFin.setHours(dateFin.getHours() + 1);
    const hFin = new Intl.DateTimeFormat(locale, { hour: 'numeric' }).format(dateFin);
    return `${hDebut}-${hFin}`;
  }

  public override weekViewHour({ date, locale }: DateFormatterParams): string {
    const hDebut = new Intl.DateTimeFormat(locale, { hour: 'numeric'}).format(date);
    const dateFin = new Date(date);
    dateFin.setHours(dateFin.getHours() + 1);
    const hFin = new Intl.DateTimeFormat(locale, { hour: 'numeric' }).format(dateFin);
    return `${hDebut}-${hFin}`;
    
  }

  public override weekViewTitle({ date, locale }: DateFormatterParams): string {
    const startDate = new Date(date);
    const endDate = new Date(date);

    // Trouver le premier jour de la semaine courante
    const firstDayOfWeek = startDate.getDate() - startDate.getDay() + 1;
    startDate.setDate(firstDayOfWeek);
    endDate.setDate(startDate.getDate() + 4); 

    const startDay = new Intl.DateTimeFormat(locale, { day: 'numeric' }).format(startDate);
    const startMonth = new Intl.DateTimeFormat(locale, { month: 'long' }).format(startDate);
    const startYear = new Intl.DateTimeFormat(locale, { year: 'numeric' }).format(startDate);

    const endDay = new Intl.DateTimeFormat(locale, { day: 'numeric' }).format(endDate);
    const endMonth = new Intl.DateTimeFormat(locale, { month: 'long' }).format(endDate);
    const endYear = new Intl.DateTimeFormat(locale, { year: 'numeric' }).format(endDate);

    return `${startDay} ${startMonth} ${startYear}  -  ${endDay} ${endMonth} ${endYear}`;
  }
}

@NgModule({
  declarations: [
    AnneeScolaireComponent,
    ClasseComponent,
    AddModuleComponent,
    ModuleComponent,
    PlanificationCoursComponent,
    CoursComponent,
    EmploidDuTempsComponent,
    MenuComponent,
    CustomEventTemplateComponent,
    FormSesionComponent
  ],
  imports: [
    CommonModule,
    NgSelectModule,
    FormsModule,
    ReactiveFormsModule,
    HttpClientModule,
    BrowserModule,
    BrowserAnimationsModule,
    CalendarModule.forRoot({ provide: DateAdapter, useFactory: adapterFactory }),

  ],
  providers:[
    {provide: CalendarDateFormatter, useClass: CustomDateFormatter}
  ]
})
export class PlanificationCoursModule { }
