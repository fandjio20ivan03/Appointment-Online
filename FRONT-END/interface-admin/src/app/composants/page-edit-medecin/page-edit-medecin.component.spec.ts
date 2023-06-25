import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageEditMedecinComponent } from './page-edit-medecin.component';

describe('PageEditMedecinComponent', () => {
  let component: PageEditMedecinComponent;
  let fixture: ComponentFixture<PageEditMedecinComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageEditMedecinComponent]
    });
    fixture = TestBed.createComponent(PageEditMedecinComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
