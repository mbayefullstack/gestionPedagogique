import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';
import { CalendarEvent } from 'angular-calendar';

@Component({
  selector: 'app-custom-event-template',
  templateUrl: './custom-event-template.component.html',
  styleUrls: ['./custom-event-template.component.css']
})
export class CustomEventTemplateComponent {
  @Input() event!: CalendarEvent;


  constructor(private router: Router){}



  cancelEvent(eventMouse: MouseEvent): void {
    eventMouse.stopPropagation(); // Empêche la propagation de l'événement au parent
    alert('Bouton Annuler cliqué');
    console.log(this.event);
    
  }

  updateEvent(eventMouse: MouseEvent, fragment:string): void {
    eventMouse.stopPropagation(); // Empêche la propagation de l'événement au parent
    alert('Bouton Modifier cliqué');
    console.log(this.event);
    this.router.navigateByUrl('home/navigation/cours#'+fragment);

  }
}
