import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EmploidDuTempsComponent } from './emploid-du-temps.component';

describe('EmploidDuTempsComponent', () => {
  let component: EmploidDuTempsComponent;
  let fixture: ComponentFixture<EmploidDuTempsComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [EmploidDuTempsComponent]
    });
    fixture = TestBed.createComponent(EmploidDuTempsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
