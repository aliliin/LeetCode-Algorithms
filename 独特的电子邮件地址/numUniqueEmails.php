<?php
/*
每封电子邮件都由一个本地名称和一个域名组成，以 @ 符号分隔。

例如，在 alice@leetcode.com中， alice 是本地名称，而 leetcode.com 是域名。

除了小写字母，这些电子邮件还可能包含 '.' 或 '+'。

如果在电子邮件地址的本地名称部分中的某些字符之间添加句点（'.'），则发往那里的邮件将会转发到本地名称中没有点的同一地址。例如，"alice.z@leetcode.com” 和 “alicez@leetcode.com” 会转发到同一电子邮件地址。 （请注意，此规则不适用于域名。）

如果在本地名称中添加加号（'+'），则会忽略第一个加号后面的所有内容。这允许过滤某些电子邮件，例如 m.y+name@email.com 将转发到 my@email.com。 （同样，此规则不适用于域名。）
可以同时使用这两个规则。
给定电子邮件列表 emails，我们会向列表中的每个地址发送一封电子邮件。实际收到邮件的不同地址有多少？
示例：

输入：["test.email+alex@leetcode.com","test.e.mail+bob.cathy@leetcode.com","testemail+david@lee.tcode.com"]
输出：2
解释：实际收到邮件的是 "testemail@leetcode.com" 和 "testemail@lee.tcode.com"。

来源：力扣（LeetCode）
链接：https://leetcode-cn.com/problems/unique-email-addresses
著作权归领扣网络所有。商业转载请联系官方授权，非商业转载请注明出处。
 */

$emails = ["test.email+alex@leetcode.com", "test.e.mail+bob.cathy@leetcode.com", "testemail+david@lee.tcode.com"];
$emails = ["fg.r.u.uzj+o.pw@kziczvh.com",
    "r.cyo.g+d.h+b.ja@tgsg.z.com",
    "fg.r.u.uzj+o.f.d@kziczvh.com",
    "r.cyo.g+ng.r.iq@tgsg.z.com",
    "fg.r.u.uzj+lp.k@kziczvh.com",
    "r.cyo.g+n.h.e+n.g@tgsg.z.com",
    "fg.r.u.uzj+k+p.j@kziczvh.com",
    "fg.r.u.uzj+w.y+b@kziczvh.com",
    "r.cyo.g+x+d.c+f.t@tgsg.z.com",
    "r.cyo.g+x+t.y.l.i@tgsg.z.com", "r.cyo.g+brxxi@tgsg.z.com", "r.cyo.g+z+dr.k.u@tgsg.z.com", "r.cyo.g+d+l.c.n+g@tgsg.z.com", "fg.r.u.uzj+vq.o@kziczvh.com", "fg.r.u.uzj+uzq@kziczvh.com", "fg.r.u.uzj+mvz@kziczvh.com", "fg.r.u.uzj+taj@kziczvh.com", "fg.r.u.uzj+fek@kziczvh.com", "test.email+alex@leetcode.com", "test.email@leetcode.com"];
$emails = [
    "testemail@leetcode.com",
    "testemail1@leetcode.com",
    "testemail+david@lee.tcode.com"];

// var_dump(numUniqueEmails($emails));
// function numUniqueEmails($emails)
// {

// }
// die;
// 最笨的字符串各种截取的办法
var_dump(numUniqueEmails1($emails));
function numUniqueEmails1($emails)
{
    $newArr = [];
    foreach ($emails as $value) {
        $strart = substr($value, 0, strpos($value, '@'));
        $end    = substr($value, strpos($value, '@'));
        $strart = str_replace(".", "", $strart);
        if (strpos($strart, '+')) {
            $strart = substr($strart, 0, strpos($strart, '+'));
        }
        $newArr[] = $strart . $end;
    }
    return count(array_unique($newArr));
}
