
import {Base} from '../../utils/base.js';

class Home extends Base{
  constructor(){
    super();
  }
  getBannerData(id,callBack){
    var params = {
      Url:'banner/'+id,
      sCallBack:function(res){
        callBack && callBack(res);
      }
    }
    this.request(params);
    // wx.request({
    //   url: 'http://www.baidu.com/id/'+id,
    //   method:'GET',
    //   success:function(res){
    //     // console.table(res);
    //     callBack(res);
    //   },
    //   fail:function(){

    //   }
    // })
  }
}
export {Home}