# comcomized-bp-group
required on https://comcomized.com/
adding to groups https://buddypress.org/about/groups/ the required comcomized feature with some user/post fields and 4 tables: 1 result + 3 logs:
* results: 
||id/link-to-group||type||c/d||lastV||newV||steepness|| link/id to each of the 3 Logs||
* logs:
||id||content/value||in-time|| by-authority ||
   each log of transactions or discussions or holdings,
    such that the min/max threshold of rating in group/community triggers moderators to act on (approve) record in log. 
Where 
* the record could be an offering post with (hash)tagged being replayed as an "acceptance comment"  having a link to another such post (optimally rated up to be activated) and activated when is put in a record by authority being a moderator .
* groupid/link, comcomtype, c or c/d, steepness,new_v, last_v,all v(as log of transactions).
* $comcomtype= $d$is_static@authority$is_open$pp, where y or n for is_..
 m=c/d*v is calculated, where c is members counter and v per transaction is validated such that the steepness=(nextV-v)*(c/v) is limited between +-$pp


