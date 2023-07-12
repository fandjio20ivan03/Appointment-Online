import { Component } from '@angular/core';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
  styleUrls: ['./footer.component.scss']
})
export class FooterComponent {

  annee = new Date().getFullYear();


  to_top(){
    const scrollDuration = 300;
const scrollStep = -window.scrollY / (scrollDuration / 15);


}
}
