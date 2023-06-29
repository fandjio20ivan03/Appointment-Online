import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageInfoMedecinComponent } from './page-info-medecin.component';

describe('PageInfoMedecinComponent', () => {
  let component: PageInfoMedecinComponent;
  let fixture: ComponentFixture<PageInfoMedecinComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageInfoMedecinComponent]
    });
    fixture = TestBed.createComponent(PageInfoMedecinComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
