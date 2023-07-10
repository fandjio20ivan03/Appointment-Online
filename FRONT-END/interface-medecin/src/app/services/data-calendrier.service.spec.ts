import { TestBed } from '@angular/core/testing';

import { DataCalendrierService } from './data-calendrier.service';

describe('DataCalendrierService', () => {
  let service: DataCalendrierService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DataCalendrierService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
