// import { getServerSession } from "#auth"
// import { users } from '~~/db'


// export default eventHandler(async event => {
//     const body = await readBody(event)
//     const session = await getServerSession(event)
//     if (!session) {
//         return { status: 'unauthenticated' }
//     }

//     // const user = users.find((user) => user.email === session.user?.email)
//     const account = await event.context.prisma.account.findFirst({
//         where: {
//             user: {
//                 email: body.email
//             }
//         }
//     })
//     return account 
// })