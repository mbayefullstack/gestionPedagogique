import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ExtraOptions, RouterModule, Routes } from '@angular/router';
import { GestionAbsenceModule } from './gestion-absence/gestion-absence.module';
import { HomeModule } from './home/home.module';
import { PlanificationCoursModule } from './planification-cours/planification-cours.module';
import { NavigationComponent } from './home/navigation/navigation.component';
import { EmmergementComponent } from './gestion-absence/emmergement/emmergement.component';
import { AnneeScolaireComponent } from './planification-cours/annee-scolaire/annee-scolaire.component';
import { ClasseComponent } from './planification-cours/classe/classe.component';
import { AddModuleComponent } from './planification-cours/module/add-module/add-module.component';
import { ModuleComponent } from './planification-cours/module/module.component';
import { PlanificationCoursComponent } from './planification-cours/planification-cours.component';
import { CoursComponent } from './planification-cours/cours/cours.component';

const routes: Routes = [
  { path: '', redirectTo: '/accueil', pathMatch: 'full' },
  // { path: '#formSessionCours', component: CommonModule },
  // { path: 'produits', component: ProductsComponent },
  { path: 'home', children:[
    { path: 'navigation', component: NavigationComponent, 
    children:[
      { path: 'scolaire', component: AnneeScolaireComponent},
      { path: 'classe', component: ClasseComponent},
      { path: 'module', component: ModuleComponent},
      { path: 'cours', component: CoursComponent},
    ]}
  ] },
  { path: 'absence', children:[
    { path: 'emmergement', component: EmmergementComponent},
  ] },
  { path: 'cours', children:[
    { path: 'scolaire', component: AnneeScolaireComponent},
    { path: 'classe', component: ClasseComponent},
    { path: 'module', component: AddModuleComponent},
  ] },
];

const routerOptions: ExtraOptions = {
  scrollPositionRestoration : 'enabled',
  anchorScrolling: 'enabled',
}

@NgModule({
  declarations: [],
  imports: [
    RouterModule.forRoot(routes, routerOptions),
    CommonModule,
    GestionAbsenceModule,
    HomeModule,
    PlanificationCoursModule
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
