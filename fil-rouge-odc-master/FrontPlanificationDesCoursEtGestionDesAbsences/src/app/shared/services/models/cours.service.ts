import { Injectable } from '@angular/core';
import { Cours } from '../../interfaces/models/cours';
import { Observable, catchError, tap, throwError } from 'rxjs';
import { ApiResponse } from '../../interfaces/api-response';
import { environment } from 'src/environments/environment';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class CoursService {

  constructor(private httpClient:HttpClient) { }

  get endPointUrl(): string {
    return `cours`;
  }

  add(cours: Cours): Observable<ApiResponse<any>> {
    const apiUrl = `${environment.api.baseUrl}${this.endPointUrl}`;

    return this.httpClient.post<ApiResponse<any>>(apiUrl, cours).pipe(
      tap(response => {
        console.log('Données reçues aprés insertion:', response);
      }),
      catchError(error => {
        console.error('Une erreur s\'est produite:', error);
        return throwError(()=>new Error("Erreur lors de l'insertion des données."));
      })
    );
  }
}
