import { TestBed } from '@angular/core/testing';

import { DataExceptionService } from './data-exception.service';

describe('DataExceptionService', () => {
  let service: DataExceptionService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(DataExceptionService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
