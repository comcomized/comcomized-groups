# comcomized-groups 
required for implementing platform based on https://comcomized.com/term-and-conditions/   
and in dvolpement under the Groups Collaborating Comcomized Platform (GCCP)  http://namzezam.wikidot.com/blog:24  
use case: groups in assets-parent of owner-child hierarchy 
as a plugin or practise on worspress or dupal
by adding the required comcomized features with some user/post fields and 4 tables: 1 result + 3 logs:
* results, where c*v=m*d:  
 * | name  | type | d|c | lastV |newV|steepness| link/id to each of the 3 Logs and the group/s of activities |
* logs:
 * | id | content/value|in-time | by-authority |
   * each log of transactions or discussions or holdings,
    such that the min/max threshold of rating in group/community triggers moderators to act on (approve) record in log. 
Where 
* the record could be an offering post with (hash)tagged being replayed as an "acceptance comment"  having a link to another such post (optimally rated up to be activated) and activated when is put in a record by authority being a moderator .
* groupid/link, comcomtype, c or c/d, steepness,new_v, last_v,all v(as log of transactions).
* $comcomtype= $d$is_static@authority$is_open$pp, where y or n for is_..
 m=c/d*v is calculated, where c is members counter and v per transaction is validated such that the steepness=(nextV-v)*(c/v) is limited between +-$pp




