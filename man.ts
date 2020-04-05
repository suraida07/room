import { ApikeyProvider } from './../../providers/apikey/apikey';
import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';
import { AlertController } from 'ionic-angular';

@IonicPage()
@Component({
  selector: 'page-man',
  templateUrl: 'man.html',
})
export class ManPage {
  data_rented : string;
  room:any=[];
  price : any ={};
  constructor(public navCtrl: NavController, public navParams: NavParams,private keyAPI : ApikeyProvider,public alertCtrl: AlertController) {
    this.getMan();
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad ManPage');
  }

  getMan(){
    // this.data_rented = this.navParams.data;
    this.keyAPI.data_manshion().subscribe(data=>{
      this.room = data;
      console.log(data);
    });
  }
  onSearch(ev :any){
    let val = ev.target.value;
    if(val != 0){
      this.keyAPI.data_sea(val).subscribe(data =>{
        this.room = data;
      });
    }else{
      this.getMan();
    }
  }

  viewDetail(item){
    this.navCtrl.push("DetailPage",item);
  }

  select(){
    let alert = this.alertCtrl.create();
    alert.setTitle('เลือกราคาห้องพัก');
    alert.addInput({
    type: 'checkbox',
    label: 'น้อยกว่า 3000',
    value: '1',
  });

  alert.addInput({
    type: 'checkbox',
    label: '3000-4000',
    value: '2'
  });
  alert.addInput({
    type: 'checkbox',
    label: '4000-5000',
    value: '3'
  });

  alert.addInput({
    type: 'checkbox',
    label: 'มากว่า 5000',
    value: '4'
  });
  alert.addButton('Cancel');
  alert.addButton({
    text: 'Okay',
    handler: data => {
    this.price = data;
      console.log(this.price);
      if(this.price == 1){
        this.keyAPI.lod3().subscribe(data=>{
        this.room = data;
        });
      }else if(this.price == 2){
        this.keyAPI.lod34().subscribe(data=>{
        this.room = data;
         });
      }else if(this.price == 3){
        this.keyAPI.lod45().subscribe(data=>{
        this.room = data;
         });
      }else if(this.price == 4){
        this.keyAPI.lod5().subscribe(data=>{
        this.room = data;
         });
      }
    }
  });
  alert.present();
}

}