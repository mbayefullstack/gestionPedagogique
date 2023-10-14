import { ElementRef, Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class NotionationService {

  constructor() { }


afficherMessage(viewChild: ElementRef, texte: string, classe: string): void {
  const element: HTMLElement | null = viewChild?.nativeElement;
  if (element) {
    viewChild.nativeElement.style.display = 'block';
    viewChild.nativeElement.classList.add(classe);
    element.innerHTML = `<marquee loop="1" behavior="slide" scrollamount="150" direction="left">${texte}</marquee>`;
    setTimeout(() => {
      viewChild.nativeElement.style.display = 'none';
      viewChild.nativeElement.classList.remove(classe);
      element.innerHTML = '';
    }, 3000);
  }
}
}
