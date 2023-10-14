import { Component } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.css']
})
export class MenuComponent {

  salles = [
    {id: 1, libelle: 'Sonko'},
    {id: 2, libelle: 'Nelson Mandela'},
    {id: 3, libelle: 'Eistein'},
    {id: 4, libelle: 'Me'},
  ];

  types = [
    {id: 1, libelle: "CLASSE"},
    {id: 2, libelle: 'PROFESSEUR'},
  ]

  typeSelected = {id: 1, libelle: "CLASSE"};

  classes = [
    {id: 1, libelle: "Dev web/mobile 1"},
    {id: 2, libelle: 'Dev web/mobile 2'},
    {id: 3, libelle: 'Dev web/mobile 3'},
    {id: 4, libelle: 'Ref Dig 1'},
    {id: 5, libelle: 'Ref Dig 2'},
    {id: 6, libelle: 'Ref Dig 3'},
  ]

  profs = [
    {id: 1, prenom: "Ibrahim", nom: "Diao"},
    {id: 2, prenom: 'Moussa', nom: "Doumbya"},
    {id: 3, prenom: 'Khady', nom: "Gueye"},
    {id: 4, prenom: 'Silmang', nom: "Sarr"},
    {id: 5, prenom: 'Sira', nom: "Diallo"},
    {id: 6, prenom: 'Malick', nom: "Mendy"},
  ]

  statuts = [
    {id: 1, libelle: "TOUT"},
    {id: 2, libelle: 'EN COURS'},
    {id: 3, libelle: 'TERMINE'},
    {id: 4, libelle: 'ANNULER'},
    {id: 5, libelle: 'DEMANDE ANNULER'},
    {id: 6, libelle: 'VALIDER'},
  ]

  constructor(private router: Router){}

  goToPart(fragment: any){
    this.router.navigateByUrl('home/navigation/cours#'+fragment);
  }

}
