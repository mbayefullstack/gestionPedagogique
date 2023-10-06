import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { RpModule } from './rp/rp.module';

const routes: Routes = [
  {path:"rp", loadChildren: () => import ('./rp/rp.module').then(m => m.RpModule)}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
