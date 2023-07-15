import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageRendezVousComponent } from './page-rendez-vous.component';

describe('PageRendezVousComponent', () => {
  let component: PageRendezVousComponent;
  let fixture: ComponentFixture<PageRendezVousComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageRendezVousComponent]
    });
    fixture = TestBed.createComponent(PageRendezVousComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
