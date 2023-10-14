import { Component } from '@angular/core';
import { CalendarEvent, CalendarView } from 'angular-calendar';
import { Day, isSameDay, isSameMonth } from 'date-fns';
import { th } from 'date-fns/locale';
import { CustomEventTemplateComponent } from './custom-event-template/custom-event-template.component';
import { RRule } from 'rrule';



@Component({
  selector: 'app-emploid-du-temps',
  templateUrl: './emploid-du-temps.component.html',
  styleUrls: ['./emploid-du-temps.component.css']
})
export class EmploidDuTempsComponent {
  boutonActif: string = "week";
  btnNavActif: string = "today";

  viewDate: Date = new Date();
  view: CalendarView = CalendarView.Week;
  CalendarView = CalendarView;
  events: CalendarEvent[] = [];
  activeDayIsOpen = false;

  constructor(){
    const event1 = {
      title: "Cours de tennis",
      start: new Date("2023-10-09T10:30"),
      end: new Date("2023-10-09T17:30"),
    }

    const event2 = {
      title: "Cours de Foot",
      start: new Date("2023-10-10T10:30"), // Date et heure de début de l'événement
      end: new Date("2023-10-10T18:30"), // Date et heure de fin de l'événement
      color: { // Personnalisation de la couleur de l'événement
        primary: '#000000', // Couleur principale de l'événement
        secondary: '#DDDDDD', // Couleur secondaire (utilisée pour l'arrière-plan)
      },
      actions: [ // Actions associées à l'événement (boutons, liens, etc.)
        {
          label: 'Détails', // Texte du bouton
          onClick: ({ event }: { event: CalendarEvent }): void => {
            console.log('Détails de l\'événement :', event);
          },
        },
      ],
      allDay: false, // Spécifie si l'événement dure toute la journée ou a une heure spécifique
      resizable: { // Permet de redimensionner l'événement
        beforeStart: true, // Permet de redimensionner avant le début
        afterEnd: true, // Permet de redimensionner après la fin
      },
      draggable: true, // Permet de déplacer l'événement
      meta: { // Métadonnées personnalisées que vous pouvez ajouter
        someKey: 'valeur personnalisée',
      },
    };
    
    const event3 = {
      title: 'Cours de tennis',
      start: new Date('2023-10-11T10:30'),
      end: new Date('2023-10-11T17:30'),
      // description: 'Ceci est la description de l\'événement de tennis.',
    };

    const event4 = {
      title: 'Cours de Basket',
      start: new Date('2023-10-12T08:00'),
      end: new Date('2023-10-12T11:30'),
    };

    // this.events = this.generateRecurringEvents();
    this.events.push(event1);
    this.events.push(event2);
    this.events.push(event3);
    this.events.push(event4);
  }

  setView(view: CalendarView, buttonId: string){
    this.view = view;
    this.boutonActif = buttonId;
  }

  dayClicked({date, events}:{ date: Date; events: CalendarEvent[]}):void{
    if(isSameMonth(date, this.viewDate)){
      if((isSameDay(this.viewDate, date) && this.activeDayIsOpen) || events.length === 0){
        this.activeDayIsOpen = false;
      }else{
        this.activeDayIsOpen = true;
      }
      this.viewDate = date;
    }

  }

  eventClicked(event: any){
    console.log(event);
  }
  
  setBtnActive(btnActive: string){
    this.btnNavActif = btnActive;

  }

  generateRecurringEvents(): CalendarEvent[] {
    const startHour = 13; 
    const endHour = 15; 
  
    const rrule = new RRule({
      freq: RRule.DAILY, 
      byhour: [startHour], 
      byminute: 0, 
      dtstart: new Date(new Date().getTime() - 365 * 24 * 60 * 60 * 1000),
      until: new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000), 
    });
  
    const events: CalendarEvent[] = [];
  
    const occurrences = rrule.all();
    occurrences.forEach((date) => {
      events.push({
        title: 'Pause',
        start: date,
        end: new Date(date.getTime() + 2 * 60 * 60 * 1000), 
        color: {
          primary: '#01b4ba',
          secondary: '#01b4ba',
        },
      });
    });
  
    return events;
  }
  

}
