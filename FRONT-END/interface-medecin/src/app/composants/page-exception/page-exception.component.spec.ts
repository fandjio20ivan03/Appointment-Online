import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PageExceptionComponent } from './page-exception.component';

describe('PageExceptionComponent', () => {
  let component: PageExceptionComponent;
  let fixture: ComponentFixture<PageExceptionComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PageExceptionComponent]
    });
    fixture = TestBed.createComponent(PageExceptionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
