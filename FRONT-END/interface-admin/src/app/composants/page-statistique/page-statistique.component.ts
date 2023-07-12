import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Route } from '@angular/router';
import { DataService } from 'src/app/services/data.service';
@Component({
  selector: 'app-page-statistique',
  templateUrl: './page-statistique.component.html',
  styleUrls: ['./page-statistique.component.scss']
})
export class PageStatistiqueComponent implements OnInit {

  origin = '';
  jour = (new Date().getDate()).toString() + '/' + (new Date().getMonth()).toString() + '/' + (new Date().getFullYear()).toString();;

  total_medecin = 'data error';
  total_rendez_vous =  'data error';
  total_patient = 'data error';
  augmentation_rendez_vous = 'data error';

  constructor(private activatedRoute: ActivatedRoute, private dataService: DataService) { }

  ngOnInit(): void {

    this.activatedRoute.data.subscribe(res => {
      this.origin = res['origin'];
    });
    this.dataService.getTotalDataMedecin().subscribe( res =>{
      this.total_medecin = res.toString();
    });

    this.dataService.getTotalDataRendezVous().subscribe( res =>{
      this.total_rendez_vous = res.toString();
    });

    this.dataService.getTotalDataPatient().subscribe( res =>{
      this.total_patient = res.toString();
    });
    this.dataService.getAugmentationRendezVous().subscribe( res =>{
      this.augmentation_rendez_vous = res.toString();

      if(this.augmentation_rendez_vous.at(0) !== '-'){
          this.augmentation_rendez_vous = '+' + this.augmentation_rendez_vous;
      }

      if(this.augmentation_rendez_vous.length > 6){
        this.augmentation_rendez_vous = this.augmentation_rendez_vous.substring(0,6);
      }
    });
  }
}
