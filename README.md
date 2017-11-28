# comcomized-groups under the [humanitarian-agpl-license](http://namzezam.wikidot.com/humanitarian-agpl-license)

The comcomized units platform is made of trees of ownership over assets - in which the asset is the parent of its owners, where 
* each separated tree-page is, in trees numbered category, the parent of only one current root (and hence when the tree replace its root, the new root is made its only child), 
* each of its offspring, categorized as peer or ordinary, is a position-of-ownership-page and 
* each personal-page belonging to only one human owner may have positions of ownership by 
 * tagging her/his position-of-ownership-page in the corresponding root-page, which must appear not more than once per owner!

Now developing on wordpress a new plugin making bp group a platform for common company:
* Required for implementing platform based on https://comcomized.com/term-and-conditions/   
* In dvolpement under the Groups Collaborating Comcomized Platform (GCCP)  http://namzezam.wikidot.com/blog:24  
* Current state: https://github.com/comcomist/comcomized-groups/blob/master/11.04.15  
* wiki: https://github.com/comcomist/comcomized-groups/wiki  


Each parent is an assets of its owner children (root has no parent).  
The path could be indexed, (and appeared as hexadecimal number which) equals a list of $n separated by asci 'A' (and optionally the other 5 B C D E F asci are used somehow), as $n is a decimal counter of the node in its parent.	 
The tabled are updated after an ok button is pressed to show acceptance of the offer posted by who is entitled to propose such offer.
Use case with groups in hierarchy as a plugin or practise on worspress or dupal
* by adding the required comcomized features with some user/post fields and 4 tables: 1 result + 3 logs:
 * results, where c*v=m*d:  
 * | name  | type | d|c | lastV |newV|steepness| link/id to each of the 3 Logs and the group/s of activities |
* logs: | id | content/value|in-time | by-authority |
   * as each log of transactions or discussions or holdings,
    such that the min/max threshold of rating in group/community triggers moderators to act on (approve) record in log. 
Where 
* the record could be an offering post with (hash)tagged being replayed as an "acceptance comment"  having a link to another such post (optimally rated up to be activated) and activated when is put in a record by authority being a moderator .
* groupid/link, comcomtype, c or c/d, steepness,new_v, last_v,all v(as log of transactions).
* $comcomtype= $d$is_static@authority$is_open$pp, where y or n for is_..
 m=c/d*v is calculated, where c is members counter and v per transaction is validated such that the steepness=(nextV-v)*(c/v) is limited between +-$pp


In  4 types	|transaction	|         board	   	  |		booking	    |activities in group/s|
Offer to 		|	buy	<>	sell	|	discussions<> decision|holding<>maintaining |...			 |
Who to (Offer/Accept)|...|
Field /value	|...|
using dbdelta function , for a reverse developed tree defined only by the index in some tables, each for different layer


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



