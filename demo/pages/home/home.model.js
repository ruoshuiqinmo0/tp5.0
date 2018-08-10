
import {Base} from '../../utils/base.js';

class Home extends Base{
  constructor(){
    super();
  }
  getBannerData(id,callback){
    var params = {
      Url:'banner/'+id,
      sCallBack:function(res){
        callback && callback(res.items);
      }
    }
   
    this.request(params);
  }

  getThemeData(callback) {
    var params = {
      Url: 'theme?ids=1,2,3',
      sCallBack: function (res) {
        callback && callback(res);
      }
    }

    this.request(params);
  }

  getProductsData(callback) {
    var params = {
      Url: 'product/recent',
      sCallBack: function (res) {
        callback && callback(res);
      }
    }

    this.request(params);
  }
}
export {Home}