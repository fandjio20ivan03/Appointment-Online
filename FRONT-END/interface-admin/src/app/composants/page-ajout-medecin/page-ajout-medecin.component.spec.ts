import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageAjoutMedecinComponent } from './page-ajout-medecin.component';

describe('PageAjoutMedecinComponent', () => {
  let component: PageAjoutMedecinComponent;
  let fixture: ComponentFixture<PageAjoutMedecinComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageAjoutMedecinComponent]
    });
    fixture = TestBed.createComponent(PageAjoutMedecinComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
