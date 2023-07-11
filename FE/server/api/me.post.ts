import { getServerSession } from "#auth"
import { users } from '~~/db'


export default eventHandler(async event => {
    const body = await readBody(event)
    const query = await getQuery(event)
    const runtimeConfig = useRuntimeConfig()
    if (query.API_ROUTE_SECRET !== runtimeConfig.API_ROUTE_SECRET) {
        throw createError({
            statusCode: 401,
            statusMessage: 'You are not authorized to call this API.',
        })
    }

    // const user = users.find((user) => user.email === session.user?.email)
    const account = await event.context.prisma.account.findFirst({
        where: {
            user: {
                email: body.email
            }
        }
    })
    return account 
})