# comcomized-groups 
Required for implementing platform based on https://comcomized.com/term-and-conditions/   
In dvolpement under the Groups Collaborating Comcomized Platform (GCCP)  http://namzezam.wikidot.com/blog:24  
The categorized comcoms table:
*    Each parent is an assets of its owner children,
*    Using depth tables (the table name has the depth), as depth is negative and starting in 0 for users, for using d-- to go to the parent (and optionally also as depth_parent-id for big parents), 
 *    where roots are in the smallest d ,
 *    where  the index, appearing as hexadecimal number, equals a list of $n separated by asci 'A' (and optionally the other 5 B C D E F asci are used somehow), as $n is a decimal counter of the node in its parent .
*	Each categorized comcoms table is updated after an ok button is pressed to show acceptance of the offer posted by who is entitled to propose such offer.

In  4 types	|transaction	|         board	   	  |		booking	    |activities in group/s|
Offer to 		|	buy	<>	sell	|	discussions<> decision|holding<>maintaining |...			 |
Who to (Offer/Accept)|...|
Field /value	|...|
using dbdelta function , for a reverse developed tree defined only by the index in some tables, each for different layer

Use case: groups in assets-parent of owner-child hierarchy 
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

 the  record also has amount of its children and a list of its parents of different trees 
and funtions as a node in one or more tree while

using dbdelta function , for a reverse developed tree defined only by the index in some tables, each for different layer
 * parent is assets of its owner children, 
 * using depth tables (the table name has the depth), 
  * where depth is negative and starting in 0 for users, 
  * such that d-- to go to the parent and roots is in the smallest d  (optionally also as depth_parent-id for big parents).
* index appears as hexadecimal number which equals a list of $n separated by asci 'A', where $n is a decimal counter of the node in its parent and the other 5 asci are used as follows  
    B
    C
    D
    E
    F 



